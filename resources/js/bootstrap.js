

import axios from 'axios';

// import toastr from 'toastr';
// import 'toastr/build/toastr.min.css';
// window.toastr = toastr;
// toastr.options = {
//     closeButton: true,
//     progressBar: true,
//     positionClass: 'toast-top-right',
//     timeOut: 5000,
// };
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

