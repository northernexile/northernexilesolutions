
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {Address} from "../types/types";
import InitialState ,{SetAddressAction} from "../types/address";

const initialState: InitialState = {
    address:{
        thoroughfare:null,
        address_line_1:null,
        address_line_2:null,
        address_line_3:null,
        town:null,
        county:null,
        postcode:null,
    },
    addresses:[]
}

export const addressSlice = createSlice({
    name: SetAddressAction,
    initialState: initialState,
    reducers: {
        setAddress: (state,action: PayloadAction<Address>) => {
            state.address = action.payload
        },
        setAddresses: (state,action:PayloadAction<Array<Address>>) => {
            state.addresses = action.payload
        },
    }
});

const selectAddress = (state) => state.address.address

export default addressSlice
export {selectAddress}
