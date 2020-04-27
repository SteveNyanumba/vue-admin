<template>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {

    methods: {
            fetchStatus(){
            fetch('/home')
            .then((res)=>{
                console.log(res);
                return res
            })
            .catch((err)=>{
                console.log(err)
            })
        }
    },

    data() {

        const data = this.fetchStatus()
       return {
           statusOk: this.data.ok,
           status: this.data.status
       }


    },

    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style>

</style>
