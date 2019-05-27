/*
|-------------------------------------------------------------------------------
| VUEX modules/cafes.js
|-------------------------------------------------------------------------------
| The Vuex data store for the cafes
*/
import CafeAPI from '../api/cafe.js';

export const cafes = {
    /**
     * defines the state being monitored for the modules
     */
    state:{
        cafes:[],
        cafesLoadStatus:0,
        cafe:{},
        cafeLoadStatus:0,
        cafeAddStatus:0,
    },
    /**
     * Defines the actions used to  retrieve the data
     */
    actions:{
        loadCafes({ commit }){
            commit('setCafesLoadStatus',1);
            CafeAPI.getCafes()
                .then( function (res) {
                    commit('setCafes',res.data);
                    commit('setCafesLoadStatus',2);

                })
                .catch(function () {
                    commit('setCafes',[]);
                    commit('setCafesLoadStatus',3);
                })

        },
        loadCafe({ commit },data){
            commit('setCafeLoadStatus',1);
            CafeAPI.getCafe(data.id)
                .then(function (res) {
                    commit('setCafe',res.data);
                    commit('setCafeLoadStatus',2);
                })
                .catch(function () {
                    commit('setCafe',[]);
                    commit('setCafeLoadStatus',3);
                })
        },
        addCafe({ commit,state,dispatch },data){
            commit('setCafeAddStatus',1);
            CafeAPI.postAddNewCafe(data.name,data.addr,data.city,data.state,data.zip)
                .then(res =>{
                    commit('setCafeAddStatus',2);
                    dispatch('loadCafes');
                })
                .catch(()=>{
                    commit('setCafeAddStatus',3);
                })
        }
    },
    /**
     * Defines the mutations used
     */
    mutations:{
        setCafesLoadStatus(state,status){
            state.CafesLoadStatus = status;

        },
        setCafes(state,cafes){
            state.cafes = cafes;
        },
        setCafeLoadStatus(state,status){
            state.cafeLoadStatus = status;
        },
        setCafe(state,cafe){
            state.cafe = cafe;
        },
        setCafeAddStatus(state,status){
            state.cafeAddStatus = status;
        }
    },
    /**
     * Defines the getters used by module
     */
    getters:{
        getCafesLoadStatus(state){
            return state.cafesLoadStatus;
        },
        getCafes(state){
            return state.cafes;
        },
        getCafeLoadStatus(state){
            return state.cafeLoadStatus;
        },
        getCafe(state){
            return state.cafe;
        },
        getCafeAddStatus(state){
            return state.cafeAddStatus;
        }

    }
};

