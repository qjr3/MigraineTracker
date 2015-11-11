Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#medicine-form > input').getAttribute('value');

new Vue({
    el: '#medicines',

    data: {
        newMedicine: {
            name: '',
            description: '',
            dose: ''
        }
    },


    ready: function() {
        this.fetchMedicines();
    },

    methods: {
        fetchMedicines: function() {
            this.$http.get('/api/medicines', function(medicines) {
                this.$set('medicines', medicines);
            });
        },
        onSubmit: function() {

            var medicine = this.newMedicine;

            this.medicines.push(medicine)

            this.newMedicine = {name: '', description: '', dose: ''};

            this.$http.post('/api/medicines', medicine);
        }
    }
});