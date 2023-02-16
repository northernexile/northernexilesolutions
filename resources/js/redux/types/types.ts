
export type Technology = {
    id: any,
    skillTypeId?:any,
    name: string,
    icon:string,
    description:string
}

export type TechnologyType = {
    id?:any,
    name?:string
}

export type Content = {
    id:any,
    name:string,
    text:string
}

export type Page = {
    id:any,
    name:string,
    slug:string
}

export type Sector = {
    id:any
    name:string,
    icon:string
}

export type Company = {
    vatNumber:string,
    companiesHouseNumber:string
}

export type TagCloud = {
    id:any,
    value:string,
    count:any
}

export type Service = {
    id:any,
    name:string
}

export type Registration = {
    name:string,
    email:string,
    password:string,
    confirmed:string
}

export type Login = {
    email:string,
    password:string
}

export type Contact = {
    id:any,
    name:string,
    email:string,
    text:string
    created_at:string
}

export type ApiError = {
    success?:boolean,
    message?:string,
    data?:[],
    code?:bigint
}

export type Experience = {
    id?:any,
    company?:string,

    title?:string
    description?:string,
    start?:string,
    stop?:string
}

export type Project = {
    id?:any,
    experienceId?:any,
    description?:string
}

export type Tag = {
    id?:any,
    name?:string
}

export type ExperienceTag = {
    id?:any,
    tagId?:any,
    experienceId?:any,
}

export type ExperienceTechnology = {
    id?:any,
    skillId?:any,
    experienceId?:any,
}

export type ExperienceSector = {
    id?:any,
    sectorId?:any,
    experienceId?:any,
}

export type CV = {
    cv:any
}

export type Color = {
    red:any,
    green:any,
    blue:any,
    rgba:string,
    hex:string
}

export type DataSet = {
    label:string,
    data:any,
    backgroundColor:Color
}

export type Chart = {
    data:any,
    title:string
}

export type Client = {
    id?:any,
    name?:string,
    email?:string,
    phone?:string
}

export type Address = {
    id?:any,
    thoroughfare?:string,
    address_line_1?:string,
    address_line_2?:string,
    address_line_3?:string,
    town?:string,
    county?:string,
    postcode?:string,

    client_id?:any
}

export type ClientInvoice = {
    id?:any,
    client_id?:any,
    status?:any,
    created_at?:any,
    updated_at?:any
}

export type ClientInvoiceItem = {
    id?:any,
    client_invoice_id?:any,
    amount_in_pence_ex_vat?:any,
    ex_vat?:any,
    currency?:string,
    currency_symbol?:string,
    description?:string,
    item_date?:any
}

export type ClientAddress = {
    id?:any,
    client_id?:any,
    address_id?:any,
}
