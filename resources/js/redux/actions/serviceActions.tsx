

import companySlice from "../slices/serviceSlice";
import {AnyAction} from "redux";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {Service} from "../types/types";
import ServiceService from "../services/servicesService";

export const ServiceActions = serviceSlice.actions

export const getServices = ():ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        const response:Service[] = await ServiceService.get()
        dispatch(ServiceActions.setServices(response))

    }
}
