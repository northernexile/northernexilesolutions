
import moment, { Moment } from "moment";


export default function Dates(dateTime,format){
    const locale = 'en-gb'
    const tz = 'Europe/London'

    return moment(dateTime).locale(locale).format(format)
}
