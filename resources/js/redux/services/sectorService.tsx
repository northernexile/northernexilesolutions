

import Api from '../api/api'

export default {
    async getAll(){
        const response = await Api().get('sectors')
        return response.data.data.sectors;
    }
}
