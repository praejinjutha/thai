/*ไฟล์js*/
document.addEventListener("DOMContentLoaded", function() {
    // เลือกตาราง
    const searchInput = document.getElementById("searchInput");
    const wordByWordTable = document.getElementById("wordByWordTable");
    const errorSound = new Audio('../assets/js/error.mp3');

    // ดึงข้อมูล JSON จากไฟล์
    fetch('../assets/js/critical.json')
        .then(response => response.json())
        .then(data => {
            // เรียกใช้ฟังก์ชันสำหรับแสดงข้อมูลในตาราง
            displayData(data.Sheet1);

            let selectedWordsArray = []; // เก็บคำที่เลือกไว้ในอาร์เรย์

            // สร้าง Event Listener เมื่อคลิกที่แถวในตาราง
           wordByWordTable.addEventListener("click", function(event) {
    if (event.target.tagName === "TD") {
        
        const wordCell = event.target.parentNode.querySelector("td:nth-child(2)");
        const word = wordCell.textContent;

        if (selectedWordsArray.includes(word)) {
            // หากคำนั้นถูกเลือกแล้ว ไม่ต้องทำอะไร
            return;
        } else {
            // หากคำนั้นยังไม่ถูกเลือก, เพิ่มลงใน textarea และอาร์เรย์
            searchInput.value += word + " ";
            selectedWordsArray.push(word);

            // ตั้งสีพื้นหลังของแถวที่ถูกคลิกเป็นสีฟ้า
            event.target.parentNode.style.backgroundColor = "lightblue";

            // ลบคำที่พิมพ์เพิ่มเติมทิ้ง
            const currentInputValue = searchInput.value.trim();
            const lastSpaceIndex = currentInputValue.lastIndexOf(" ");
            const newInputValue = currentInputValue.substring(0, lastSpaceIndex + 1);
            searchInput.value = newInputValue + word + " ";
        }
    }
});

            

searchInput.addEventListener("input", function() {
    const searchWords = searchInput.value.trim().toLowerCase().split(" ");  // แยกคำที่พิมพ์ต่อด้วย space
    const rows = wordByWordTable.querySelectorAll("tbody tr");

    rows.forEach(row => {
        const word = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
        let match = false;

        searchWords.forEach(searchWord => {
            if (word.startsWith(searchWord) && !selectedWordsArray.includes(searchWord)) {  
                // ใช้ startsWith เพื่อตรวจสอบคำที่มีอยู่ต้นทางในคำที่พิมพ์ และตรวจสอบว่าคำนั้นไม่ได้ถูกเลือกแล้ว
                match = true;
            }
        });

        if (match) {
            row.style.display = "";
            row.classList.add("matched-row"); // เพิ่ม class เมื่อตรงกับคำที่พิมพ์
        } else {
            row.style.display = "none";
            row.classList.remove("matched-row"); // ลบ class เมื่อไม่ตรงกับคำที่พิมพ์
        }
    });

    // ลบสีฟ้าที่เคยเน้นไว้ทุกแถวก่อนที่จะเน้นใหม่
    const highlightedRows = wordByWordTable.querySelectorAll(".matched-row");
    highlightedRows.forEach(row => {
        row.style.backgroundColor = "";
    });
});

           // เพิ่ม event listener เมื่อคลิกที่ไอคอนเสียง
document.querySelector(".bi-volume-up-fill").addEventListener("click", function() {
    // ดึงข้อความทั้งหมดใน textarea และแยกเป็นคำๆ
    const selectedWords = searchInput.value.trim().split(" ");

    // ตรวจสอบว่ามีคำที่ถูกเลือกหรือไม่
    if (selectedWords.length > 0) {
        // ดึงข้อมูล JSON จากไฟล์
        fetch('../assets/js/critical.json')
            .then(response => response.json())
            .then(data => {
                // สร้างอาร์เรย์เพื่อเก็บเสียงของคำที่ถูกเลือก
                const soundFiles = [];

                // วนลูปผ่านคำที่ถูกเลือก
                selectedWords.forEach(word => {
                    // ค้นหาเสียงของคำที่เลือก
                    const soundFile = data.Sheet1.find(item => item.Words === word)?.Sounds;
                    // หากพบเสียง ให้เพิ่มลงในอาร์เรย์
                    if (soundFile) {
                        soundFiles.push(soundFile);
                    }
                });

                // ตรวจสอบว่ามีเสียงที่ต้องเล่นหรือไม่
                if (soundFiles.length > 0) {
                    // หยุดการเล่นเสียงที่กำลังเล่นอยู่ (ถ้ามี)
                    if (currentAudio) {
                        currentAudio.pause();
                        currentAudio = null;
                    }

                    // สร้างตัวแปรเพื่อเก็บเสียงที่จะเล่นในแต่ละครั้ง
                    let index = 0;

                    // สร้างฟังก์ชันเพื่อเล่นเสียงของคำแต่ละคำในลำดับที่ถูกเลือก
                    const playNextSound = () => {
                        // ตรวจสอบว่ายังมีเสียงที่ต้องเล่นอยู่หรือไม่
                        if (index < soundFiles.length) {
                            // ดึงเสียงของคำในลำดับที่ต้องเล่น
                            const soundFile = soundFiles[index];
                            // สร้าง URL สำหรับไฟล์เสียง
                            const audioSrc = `../assets/js/WordSound/${soundFile}`;
                            // สร้างอ็อบเจ็กต์ Audio
                            const audio = new Audio(audioSrc);
                            // เมื่อเสียงเล่นเสร็จ ให้เล่นเสียงของคำต่อไป
                            audio.addEventListener("ended", () => {
                                index++;
                                playNextSound();
                            });
                            // เล่นเสียง
                            audio.play();
                            // กำหนดค่าอ็อบเจ็กต์ Audio ที่กำลังเล่นอยู่ให้กับตัวแปร global
                            currentAudio = audio;
                        } else {
                            // เมื่อเล่นเสียงเสร็จแล้ว ตรวจสอบว่าไม่มีข้อความในช่องค้นหาและไม่มีแถวที่ตรงกับข้อความที่ใส่เข้าไป แล้วรีเซ็ตตารางกลับไปเป็นตารางเริ่มต้น
                            if (searchInput.value.trim() === "" && document.querySelectorAll(".matched-row").length === 0) {
                                displayData(data.Sheet1);
                            }
                        }
                    };

                    // เริ่มเล่นเสียงคำแรก
                    playNextSound();
                } else {
                    // แสดงข้อความแจ้งเตือนเมื่อไม่พบเสียงสำหรับคำที่เลือก
                    showAlertWithSound("ไม่พบเสียงสำหรับคำที่เลือก");
                }
            })
            .catch(error => console.error('เกิดข้อผิดพลาดในการโหลดข้อมูล:', error));
    } else {
        alert("กรุณาเลือกคำก่อนเสียง");
    }
});

        })
        .catch(error => console.error('เกิดข้อผิดพลาดในการโหลดข้อมูล:', error));

    // ฟังก์ชันสำหรับแสดงข้อมูลในตาราง
    function displayData(data) {
        const tableBody = document.querySelector('#wordByWordTable tbody');

        // เคลียร์ข้อมูลทั้งหมดในตารางก่อน
        tableBody.innerHTML = '';

        // สร้างแถวและเติมข้อมูลลงในตาราง
        data.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.No}</td>
                <td>${item.Words}</td>
            `;
            tableBody.appendChild(row);
        });
    }

    // สร้างตัวแปร global เพื่อเก็บอ็อบเจ็กต์ Audio ที่กำลังเล่นอยู่
    let currentAudio = null;

    // ฟังก์ชันสำหรับแสดงข้อความแจ้งเตือนพร้อมเสียง error
    function showAlertWithSound(message) {
        // เล่นเสียง error.mp3
        errorSound.play();

        // แสดงข้อความแจ้งเตือน
        alert(message);
    }
    
});
