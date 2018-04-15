<template>
    <div>
        <div class="form-group">
            <div class="form-label">Event Type</div>
            <div class="custom-controls-stacked">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="is_conference" value="1" v-model="event_type">
                    <span class="custom-control-label">Conference</span>
                </label>

                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="is_meetup" value="2" v-model="event_type">
                    <span class="custom-control-label">Meetup</span>
                </label>

                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="is_hackathon" value="3" v-model="event_type">
                    <span class="custom-control-label">Hackathon</span>
                </label>
            </div>
        </div>

        <create-conference v-if="event_type === '1'"></create-conference>
        <create-meetup v-if="event_type === '2'"></create-meetup>
        <create-hackathon v-if="event_type === '3'"></create-hackathon>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                event_type: null
            }
        },

        mounted() {
            //
        },

        methods: {
            //
        }
    }
</script>

<style scoped>

</style>