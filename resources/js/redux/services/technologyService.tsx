
import Api from "../api/api";

export default {
    async getAllTechnologies(){
        const response = await Api().get('skills')
        return response.data.data.skills;
    }
}
