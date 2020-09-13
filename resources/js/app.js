/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
    	greetings: 'Welcome to Crediting System',
    	selected: '',
    	loanAmount: 0,
    	interest: 0,
    	days:0,
    	totalInterest: 0,
    	totalPayable:0,
    	totalPerDayPay:0,
        interestDec:0,
    	
    },

    methods: {
    	updateLoanAmount(event) {  		
 	 		this.loanAmount = event.target.value
 	 		this.totalInterest = this.loanAmount * this.interest1
 	 		this.totalPayable = parseInt(this.loanAmount) +  parseInt(this.totalInterest)
 	 		this.totalPerDayPay = this.totalPayable / this.days
    	},
    	updateInterest(event) {  		
 	 		this.interest = event.target.value
            this.interestDec = this.interest / 100
 	 		this.totalInterest = this.loanAmount * this.interestDec
 	 		this.totalPayable = parseInt(this.loanAmount) +  parseInt(this.totalInterest)
 	 		this.totalPerDayPay = this.totalPayable / this.days
    	}, 	
    	updateTotalPerDayPay(event){
    		this.totalPerDayPay = this.totalPayable / this.days
    		this.totalPerDayPay = parseFloat(this.totalPerDayPay).toFixed(2)

    	},
    	updateTotalDays(event){
    		this.totalPerDayPay = event.target.value
    		this.days = this.totalPayable / this.totalPerDayPay 
    	},
    	reset(event) {
    		this.loanAmount = 0
    		this.interest = 0
    		this.days = 0
    		this.totalInterest = 0
    		this.totalPayable = 0
    		this.totalPerDayPay = 0
            this.interestDec = 0
    	}

    },

});
