/**
 * Imports the Roast API URL from the config.
 */
import { ROAST_CONFIG } from '../config.js';

export default {
    /**
     * GET '/api/v1/cafes'
     * @returns {*}
     */
    getCafes(){
       return  axios.get( ROAST_CONFIG.API_URL + '/cafes' );
    },
    /**
     * GET '/api/v1/cafes/id'
     * @param id
     * @returns {*}
     */
    getCafe(id){
        return axios.get( ROAST_CONFIG.API_URL + '/cafes/' + id );
    },
    /**
     * @param name
     * @param addr
     * @param city
     * @param state
     * @param zip
     * @returns {*}
     */
    postAddNewCafe(name,addr,city,state,zip){
        return axios.post( ROAST_CONFIG.API_URL + '/cafes',
            {
                name:name,
                addr:addr,
                city:city,
                state:state,
                zip:zip,
            }
        )

    }
}

