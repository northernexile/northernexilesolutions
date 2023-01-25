
import axios from "axios";

export default ()=>{
    // @ts-ignore
    axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('userToken')}`;
    return axios.create({
        baseURL:'/api/'
    })
}
