
import {Chart,DataSet,Color} from "./types"

interface InitialState {
    charts:[],
    chart:{
        labels:[],
        datasets:[]
    }
}

const SetChartAction = 'Chart'

export default InitialState
export {SetChartAction}
