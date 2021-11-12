/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import EmployeeListPanel from './components/employee/EmployeeListPanel.vue';
import EmployeeListNewPanel from './components/employee/EmployeeListNewPanel.vue';
import EmployeeListEditPanel from './components/employee/EmployeeListEditPanel.vue';
require('./bootstrap');

window.Vue = require('vue').default;
Vue.config.productionTip = false;
Vue.config.devtools=true;
if(window.location.href.includes("/admin/users-list")) {
    var ninjaGroupChatMain = new Vue({
        el: '#employeelists',
        render: EmployeeList => EmployeeList(EmployeeListPanel)
    });
}
if(window.location.href.includes("/admin/users-list/new")) {
    var employeeListNew = new Vue({
        el: '#employeelistsnew',
        render: EmployeeListNew => EmployeeListNew(EmployeeListNewPanel)
    });
}

if(window.location.href.includes("/admin/users-list/edit")) {
    var employeeListEdit = new Vue({
        el: '#employeelistsedit',
        render: EmployeeListEdit => EmployeeListEdit(EmployeeListEditPanel)
    });
}