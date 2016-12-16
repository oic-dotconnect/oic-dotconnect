import request from 'superagent';

export const getFavTags = (q) => {
    return request.get('/api/candidacy_tags/').query({ q: 1 })

}

export const getTags = (q) => {
    return request.get('/api/candidacy_tags/').query({ q: q })
}

export const getEvent = (q, tag, start, end) => {
    let query = {}
    if (q !== '') query["q"] = q
    if (tag !== '') query["tag"] = tag
    if (start !== '') query["startdate"] = start
    if (end !== '') query["enddate"] = end
    console.log(query)
    return request.get('/api/events/').query(query)
}