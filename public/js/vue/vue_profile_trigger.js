Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#trigger-form > input').getAttribute('value');

new Vue({
    el: '#triggers',

    data: {
        triggers: [],
        newTrigger: {
            name: '',
            description: ''
        }
    },


    ready: function() {
        this.fetchTriggers();
    },

    methods: {
        fetchTriggers: function() {
            this.$http.get('/api/triggers', function(triggers) {
                this.$set('triggers', triggers);
            });
        },
        onSubmit: function(e) {
            var trigger = this.newTrigger;

            this.triggers.push(trigger)

            this.newTrigger = {name: '', trigger: ''};

            this.$http.post('/api/triggers', trigger);
        },
        delete: function(index) {
            var trigger = this.triggers[index];

            this.triggers.splice(index, 1);

            this.$http.post('/api/triggers/' + trigger.id + '/destroy');
        }
    }
});