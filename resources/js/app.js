require('./bootstrap');

window.Vue = require('vue');

/*import store from './store'*/

window.marked = require('marked');

import Helper from './Helper'
window.Helper = new Helper()

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
 
const options = {
    title: 'Hey...',
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#78909C'
}
Vue.use(VueSweetalert2, options);


Vue.component('skill-courses', require('./components/SkillCourses.vue').default);
Vue.component('course-component', require('./components/CourseComponent.vue').default);
Vue.component('lesson-component', require('./components/LessonComponent.vue').default);

Vue.component('markdown', require('./components/Markdown.vue').default);
Vue.component('menu-component', require('./components/Menu.vue').default);
Vue.component('file-upload', require('./components/FileUpload.vue').default);
Vue.component('courses', require('./components/Courses.vue').default);

Vue.component('portlet-component', require('./components/PortletComponent.vue').default);

Vue.component('academic', require('./components/Academic.vue').default);

const app = new Vue({
    //store
}).$mount('#app');

window.app = app

