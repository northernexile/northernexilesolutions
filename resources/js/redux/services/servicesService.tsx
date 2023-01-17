


import Api from '../api/api'

export default {

    async get(){
        const response = await Api().get(`services`)
        return response.data.data.services
    }
}
