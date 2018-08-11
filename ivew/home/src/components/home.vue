<template>
    <div>
        <pheader></pheader>
        <pfooter></pfooter>
    </div>
</template>
<script>
    import pheader from '@/components/public/header';
    import pfooter from '@/components/public/footer';
    export default {
        data () {
            return {
                value11: '',
                value12: '',
                value13: '',
                select1: 'http',
                select2: 'com',
                select3: 'day'
            }
        },
    components:{
        pheader,
        pfooter
    }
    }
</script>
