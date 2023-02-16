
import {ClientInvoiceItem} from "./types";

interface InitialState {
    clientInvoiceItem:ClientInvoiceItem,
    clientInvoiceItems:ClientInvoiceItem[]
}

const SetClientInvoiceItemAction = 'ClientInvoiceItem'

export default InitialState
export {SetClientInvoiceItemAction}
