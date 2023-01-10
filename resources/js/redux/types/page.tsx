
import {Page} from "./types";

interface InitialState  {
    pages:Page[],
    active:Page
}

const SetPageAction = 'Page'

export default InitialState
export {SetPageAction}
