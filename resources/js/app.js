require('./bootstrap');

import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { faAddressCard, faClock, faCalendar, faRegistered} from '@fortawesome/free-regular-svg-icons'
import { faSearch, faStoreAlt, faShoppingBag, faSignOutAlt, faYenSign, faCamera, faChevronLeft, faChevronRight} from '@fortawesome/free-solid-svg-icons'

library.add(faCalendar,
            faSearch,
            faAddressCard,
            faStoreAlt,
            faShoppingBag,
            faSignOutAlt,
            faYenSign,
            faClock,
            faCamera,
            faRegistered,
            faChevronLeft,
            faChevronRight
)

dom.watch()

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
