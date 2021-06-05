require('./bootstrap');

document.querySelector('.image-picker input').addEventListener('change', (e) => {
    const input = e.target
    const reader = new FileReader()
    reader.onload = (e) => {
        //親に戻り、imgタグを指定
        input.closest('.image-picker').querySelector('img').src = e.target.result
    }

    if (input.files[0]) {
        reader.readAsDataURL(input.files[0])
    }
})
