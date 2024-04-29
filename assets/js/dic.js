document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("searchInput");
    const dictionaryTable = document.getElementById("dictionaryTable");
    const notification = document.getElementById("notification"); // เพิ่มตัวแปรสำหรับข้อความแจ้งเตือน

    // Add table header
    const tableHeader = document.createElement('thead');
    tableHeader.innerHTML = `
        <tr>
        <th style="width: 180px;">คำ</th>
            <th>คำอ่าน</th>
            <th>ความหมาย</th>
            <th>เสียง</th>
        </tr>
    `;
    dictionaryTable.appendChild(tableHeader);

    // Load the JSON file
    fetch('../assets/js/dic.json')

        .then(response => response.json())
        .then(data => {
            const dictionary = data.Sheet1 || []; // Select data from Sheet1

          // Function to filter dictionary based on search input
function filterDictionary(searchTerm) {
    if (searchTerm.length === 0) {
        clearDictionary();
        notification.textContent = ""; // Clear notification if search term is empty
        return;
    }

    const filteredDictionary = dictionary.filter(entry => {
        // Check if the entry word starts with the search term
        return entry.Words.startsWith(searchTerm);
    });

    // Count words starting with the search term
    const count = filteredDictionary.length;

    // Show notification
    if (searchTerm) {
        notification.textContent =  `คำศัพท์ที่พบมีจำนวน ${count} รายการ`; //`คำศัพท์ในหมวด "${searchTerm}" ่พบมีจำนวน ${count} รายการ`;
    } else {
        notification.textContent = ""; // Clear notification if search term is empty
    }

    displayDictionary(filteredDictionary);
}


            // Function to clear dictionary entries
            function clearDictionary() {
                dictionaryTable.querySelector('tbody').innerHTML = '';
            }

            // Function to display filtered dictionary entries in table format
            function displayDictionary(entries) {
                const tbody = dictionaryTable.querySelector('tbody');
                tbody.innerHTML = '';
                entries.forEach(entry => {
                    const row = document.createElement('tr');
                    const wordCell = document.createElement('td');
                    const readsCell = document.createElement('td');
                    const translatesCell = document.createElement('td');
                    const soundCell = document.createElement('td');

                    wordCell.textContent = entry.Words;
                    readsCell.textContent = entry.Reads;
                    translatesCell.textContent = entry.Translates;

                    // Check if the entry has sound
                    if (entry.Sounds) {
                        const audioElement = document.createElement('audio');
                        const sourceElement = document.createElement('source');
                        // Update the path to the sound file
                        sourceElement.src = `../assets/js/WordSound/${entry.Sounds}`;


                        audioElement.controls = true;
                        audioElement.appendChild(sourceElement);
                        soundCell.appendChild(audioElement);
                    }

                    row.appendChild(wordCell);
                    row.appendChild(readsCell);
                    row.appendChild(translatesCell);
                    row.appendChild(soundCell);

                    tbody.appendChild(row);
                });
            }

            // Event listener for search input
            searchInput.addEventListener('input', function() {
                filterDictionary(searchInput.value);
            });

            // Event listener for Enter key press
            searchInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    filterDictionary(searchInput.value);
                }
            });
        })
        .catch(error => console.error('Error loading dictionary:', error));

// Event listener to play sound when a row is clicked
dictionaryTable.addEventListener('click', function(event) {
    const targetElement = event.target;
    if (targetElement.tagName === 'TD') {
        const rowIndex = targetElement.parentElement.rowIndex;
        const selectedEntry = dictionary[rowIndex - 1];
        const soundCellIndex = 3; // Index of the sound cell
        // Check if the clicked cell is the sound cell and if there's a sound available
        if (targetElement.cellIndex === soundCellIndex && selectedEntry && selectedEntry.Sounds) {
            playSound(selectedEntry.Sounds);
        }
    }
});


// Function to play sound based on entry
function playSound(soundFileName) {
    const audioElement = document.createElement('audio');
    const sourceElement = document.createElement('source');
    sourceElement.src = `../assets/js/WordSound/${soundFileName}`;
    audioElement.appendChild(sourceElement);
    audioElement.play();
}

});


