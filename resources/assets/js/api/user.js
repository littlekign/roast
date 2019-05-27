import  { ROAST_CONFIG } from '../config.js';

export default {
    /**
     * Get /api/v1/user
     * @returns {*}
     */
    getUser(){
        return axios.get( ROAST_CONFIG.API_URL + '/user');
    },
    /**
     * Put /api/v1/user
     * @param public_visibility
     * @param favorite_coffee
     * @param flavor_notes
     * @param city
     * @param state
     * @returns {*}
     */
    putUpdateUser( public_visibility, favorite_coffee, flavor_notes, city, state ){
        return axios.put( ROAST_CONFIG.API_URL + '/user',
            {
                public_visibility: public_visibility,
                favorite_coffee: favorite_coffee,
                flavor_notes: flavor_notes,
                city: city,
                state: state
            }
        );
    }

}
