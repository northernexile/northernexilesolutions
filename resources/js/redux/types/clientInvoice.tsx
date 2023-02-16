
import {ClientInvoice} from "./types";

interface InitialState {
    clientInvoice:ClientInvoice,
    clientInvoices:ClientInvoice[]
}

const SetClientInvoiceAction = 'ClientInvoice'

export default InitialState
export {SetClientInvoiceAction}
