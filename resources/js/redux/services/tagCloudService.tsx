
import Api from '../api/api'

export default {
    async getAll(){
        const response = await Api().get('cloud')
        return response.data.data.cloud;
    }
}
