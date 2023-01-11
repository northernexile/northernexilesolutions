
import companySlice from "../slices/companySlice";
import {AnyAction} from "redux";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {Company, Content} from "../types/types";
import CompanyService from "../services/companyService";

export const CompanyActions = companySlice.actions

export const get = ():ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        const response:Company = await CompanyService.get()
        dispatch(CompanyActions.setCompany(response))

    }
}
