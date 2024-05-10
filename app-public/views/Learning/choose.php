<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

<style>
body {
    background-image: url("<?= $themes ?>assets/img/thai/page2/bg-choose.png");
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    font-family: "niramit";
}

.btn-close {
    margin-right: 10px;
    width: 5vw;
    height: 10vh;
    opacity: 1;
    transition: transform 0.3s ease-in-out;
}

.btn-close:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.btn-home {
    width: 10vh;
    height: 10vh;
    transition: transform 0.3s ease-in-out;
}

.btn-home:hover {
    cursor: pointer;
    transform: scale(1.1);
}

.btn-back {
    width: 10vh;
    height: 10vh;
    transition: transform 0.3s ease-in-out;
}

.btn-back:hover {
    cursor: pointer;
    transform: scale(1.1);
}

form {
  position: relative;
  width: 18rem;
  margin-top: 8vh;
}

.chosen-value,
.value-list {
  position: absolute;
  top: 25vh;
  left: 25vh;
  width: 100%;
}

.chosen-value {
    font-family: "niramit";
    text-transform: uppercase;
    letter-spacing: 4px;
    height: 4rem;
    width: 800px;
    font-size: 24px;
    padding: 1rem 2rem 1rem 2rem;
    background-color: #FAFCFD;
    border: 1px solid #888;
    border-radius: 2rem;
    transition: .3s ease-in-out;
    
    &::-webkit-input-placeholder {
        color: #888;
    }
    
    &:hover {
        background-color: #ffffff;
        cursor: pointer;
        
        &::-webkit-input-placeholder {
        color: #333;
        }
  }
  
  &:focus,
  &.open {
    box-shadow: 0px 5px 8px 0px rgba(0,0,0,0.2);
    outline: 0;
    background-color: #6a9e5e;
    color: #000;
    
    &::-webkit-input-placeholder {
      color: #000;
    }
  }
}

.value-list {
    font-family: "niramit";
    list-style: none;
    margin-top: 4rem;
    box-shadow: 0px 5px 8px 0px rgba(0,0,0,0.2);
    max-height: 300px;
    overflow: auto;
    transition: .3s ease-in-out;
    padding-left: 0;
    
    a {
        position: relative;
        height: 2.5rem;
        background-color: #FAFCFD;
        padding: 1.5rem;
        font-size: 20px;
        display: flex;
        align-items: center;
        cursor: pointer;
        transition: background-color .3s;
        opacity: 1;
        text-decoration: none;
        font-family: "niramit";
        color: #000;
        
        &:hover {
        background-color: #6a9e5e;
        }
        
        &.closed {
        max-height: 0;
        overflow: hidden;
        padding: 0;
        opacity: 0;
        }
    }
}

.value-list::-webkit-scrollbar {
    width: 12px;
    height: 12px;
}

.value-list::-webkit-scrollbar-track {
    background-color: #b2b2b2;
}

.value-list::-webkit-scrollbar-thumb {
    background-color: #888;
    border-radius: 50px;
    border: 3px solid #888;
}
</style>

<div class="container-fluid">
    <div class="row justify-content-end align-items-end">
        <div class="col-auto">
            <a href="<?= site_url('Learning_media_controller/explanation') ?>"> 
                <img src="<?= $themes ?>assets/img/thai/page2/back.png" alt="" class="btn-back"> 
            </a>
            <a href="<?= site_url('Learning_media_controller/media') ?>">
                <img src="<?= $themes ?>assets/img/thai/page2/home.png" class="btn-home">
            </a>
            <a href="#" onclick="window.close();">
                <img src="<?= $themes ?>assets/img/thai/page2/close.png" alt="" class="btn-close">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            <form>
                <input class="chosen-value" type="text" placeholder="เลือกชุด">
                <ul class="value-list">
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/1.html">ชุดที่ ๑</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/2.html">ชุดที่ ๒</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/3.html">ชุดที่ ๓</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/4.html">ชุดที่ ๔</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/5.html">ชุดที่ ๕</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/6.html">ชุดที่ ๖</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/7.html">ชุดที่ ๗</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/8.html">ชุดที่ ๘</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/9.html">ชุดที่ ๙</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/10.html">ชุดที่ ๑o</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/11.html">ชุดที่ ๑๑</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/12.html">ชุดที่ ๑๒</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/13.html">ชุดที่ ๑๓</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/14.html">ชุดที่ ๑๔</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/15.html">ชุดที่ ๑๕</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/16.html">ชุดที่ ๑๖</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/17.html">ชุดที่ ๑๗</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/18.html">ชุดที่ ๑๘</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/19.html">ชุดที่ ๑๙</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/20.html">ชุดที่ ๒o</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/21.html">ชุดที่ ๒๑</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/22.html">ชุดที่ ๒๒</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/23.html">ชุดที่ ๒๓</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/24.html">ชุดที่ ๒๔</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/25.html">ชุดที่ ๒๕</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/26.html">ชุดที่ ๒๖</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/27.html">ชุดที่ ๒๗</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/28.html">ชุดที่ ๒๘</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/29.html">ชุดที่ ๒๙</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/30.html">ชุดที่ ๓o</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/31.html">ชุดที่ ๓๑</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/32.html">ชุดที่ ๓๒</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/33.html">ชุดที่ ๓๓</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/34.html">ชุดที่ ๓๔</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/35.html">ชุดที่ ๓๕</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/36.html">ชุดที่ ๓๖</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/37.html">ชุดที่ ๓๗</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/38.html">ชุดที่ ๓๘</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/39.html">ชุดที่ ๓๙</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/40.html">ชุดที่ ๔o</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/41.html">ชุดที่ ๔๑</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/42.html">ชุดที่ ๔๒</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/43.html">ชุดที่ ๔๓</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/44.html">ชุดที่ ๔๔</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/45.html">ชุดที่ ๔๕</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/46.html">ชุดที่ ๔๖</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/47.html">ชุดที่ ๔๗</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/48.html">ชุดที่ ๔๘</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/49.html">ชุดที่ ๔๙</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/50.html">ชุดที่ ๕o</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/51.html">ชุดที่ ๕๑</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/52.html">ชุดที่ ๕๒</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/53.html">ชุดที่ ๕๓</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/54.html">ชุดที่ ๕๔</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/55.html">ชุดที่ ๕๕</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/56.html">ชุดที่ ๕๖</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/57.html">ชุดที่ ๕๗</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/58.html">ชุดที่ ๕๘</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/59.html">ชุดที่ ๕๙</a>
                    <a href="<?= $themes ?>assets/files/SpellTheWord/Listening-and-reading/60.html">ชุดที่ ๖o</a>
                </ul>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            
        </div>
        <div class="col-2"></div>
    </div>
</div>

<script>
const inputField = document.querySelector('.chosen-value');
const dropdown = document.querySelector('.value-list');
const dropdownArray = [... document.querySelectorAll('li')];
dropdown.classList.add('open');
inputField.focus(); 
let valueArray = [];


const closeDropdown = () => {
  dropdown.classList.remove('open');
}

inputField.addEventListener('input', () => {
  let inputValue = inputField.value.toLowerCase();
  let valueSubstring;
  if (inputValue.length > 0) {
    for (let j = 0; j < valueArray.length; j++) {
      if (!(inputValue.substring(0, inputValue.length) === valueArray[j].substring(0, inputValue.length).toLowerCase())) {
        dropdownArray[j].classList.add('closed');
      } else {
        dropdownArray[j].classList.remove('closed');
      }
    }
  } else {
    for (let i = 0; i < dropdownArray.length; i++) {
      dropdownArray[i].classList.remove('closed');
    }
  }
});

dropdownArray.forEach(item => {
  item.addEventListener('click', (evt) => {
    inputField.value = item.textContent;
    dropdownArray.forEach(dropdown => {
      dropdown.classList.add('closed');
    });
  });
})

inputField.addEventListener('focus', () => {
   inputField.placeholder = 'เลือกชุด';
   dropdown.classList.add('open');
   dropdownArray.forEach(dropdown => {
     dropdown.classList.remove('closed');
   });
});

inputField.addEventListener('blur', () => {
   inputField.placeholder = 'เลือกชุด';
  dropdown.classList.remove('open');
});

document.addEventListener('click', (evt) => {
  const isDropdown = dropdown.contains(evt.target);
  const isInput = inputField.contains(evt.target);
  if (!isDropdown && !isInput) {
    dropdown.classList.remove('open');
  }
});
</script>