<template>
    <div class="page">
        <form>
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Name
                            <input type="text" placeholder="咖啡店名" v-model="name">
                        </label>
                        <span class="validation" v-show="!validations.name.is_valid">{{
                            validations.name.text
                            }}</span>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Address
                            <input type="text" placeholder="地址" v-model="addr">
                        </label>
                        <span class="validation" v-show="!validations.addr.is_valid">{{
                            validations.addr.text
                            }}</span>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>City
                            <input type="text" placeholder="城市" v-model="city">
                        </label>
                        <span class="validation" v-show="!validations.city.is_valid">{{
                            validations.city.text
                            }}</span>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>State
                            <input type="text" placeholder="省份" v-model="state">
                        </label>
                        <span class="validation" v-show="!validations.state.is_valid">{{
                            validations.state.text
                            }}</span>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Zip
                            <input type="text" placeholder="邮编" v-model="zip">
                        </label>
                        <span class="validation" v-show="!validations.zip.is_valid">{{
                            validations.zip.text
                            }}</span>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <a class="button" @click="submitNewCafe()">提交</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import { ROAST_CONFIG } from "../config";

    export default {
        data(){
            return {
                name:'',
                addr:'',
                city:'',
                state:'',
                zip:'',
                validations:{
                    name:{
                        is_valid:true,
                        text:''
                    },
                    addr:{
                        is_valid:true,
                        text:''
                    },
                    city:{
                        is_valid:true,
                        text:''
                    },
                    state:{
                        is_valid:true,
                        text:''
                    },
                    zip:{
                        is_valid:true,
                        text:''
                    },
                }
            }
        },
        methods:{
            submitNewCafe(){
                if(this.validateNewCafe()){
                    this.$store.dispatch('addCafe',{
                        name:this.name,
                        addr:this.addr,
                        city:this.city,
                        state:this.state,
                        zip:this.zip,
                    })
                }

            },
            validateNewCafe(){
                let validateNewCafeForm = true
                if(this.name.trim() != ''){
                    this.validations.name.is_valid = true
                    this.validations.name.text = ''
                }else{
                    validateNewCafeForm = false
                    this.validations.name.is_valid = false
                    this.validations.name.text = '请输入咖啡店的名字'
                }
                if(this.addr.trim() != ''){
                    this.validations.addr.is_valid = true
                    this.validations.addr.text = ''
                }else{
                    this.validations.addr.is_valid = false
                    this.validations.addr.text = '请输入地址'
                }
                if(this.city.trim() != ''){
                    this.validations.city.is_valid = true
                    this.validations.city.text = ''
                }else{
                    this.validations.city.is_valid = false
                    this.validations.city.text = '请输入城市'
                }
                if(this.state.trim() != ''){
                    this.validations.state.is_valid = true
                    this.validations.state.text = ''
                }else{
                    this.validations.state.is_valid = false
                    this.validations.state.text = '请输入省市'
                }
                if(this.zip.trim() != ''){
                    this.validations.zip.is_valid = true
                    this.validations.zip.text = ''
                }else{
                    this.validations.zip.is_valid = false
                    this.validations.zip.text = '请输入邮编'
                }
                return validateNewCafeForm;
            }
           //  submitNewCafe(){
           //      axios.post( ROAST_CONFIG.API_URL + '/cafes',{
           //                  name:this.name,
           //                  addr:this.addr,
           //                  city:this.city,
           //                  state:this.state,
           //                  zip:this.zip,
           //      })
           //          .then(res => {
           //              console.log(res)
           //          })
           //          .catch((err)=>{
           //              console.log(err.response);
           //          })
           // }
        }

    }
</script>

<style scoped>

</style>
