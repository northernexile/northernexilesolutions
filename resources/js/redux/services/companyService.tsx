

import Api from '../api/api'

export default {

    async get(){
        const response = await Api().get(`company`)
        return response.data.data.company
    }
}
