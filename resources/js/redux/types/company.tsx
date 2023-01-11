

import {Company} from "./types";

interface InitialState  {
    company:{
        vatNumber:string,
        companiesHouseNumber:string
    }
}

const SetCompanyAction = 'Company'

export default InitialState
export {SetCompanyAction}
