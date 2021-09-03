#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    string str;
    cin >> str;
    vector<pair<char,int>> v;
    int idx = -1;
    int ans = INT_MAX;
    for(auto s : str)
    {
        if(idx == -1 || v[idx].first != s)
            v.push_back({s,1}), idx++;  
        else v[idx].second++; 
    }

    for(int i = 1; i < (int)v.size()-1; i++)
    {
        if(v[i-1].first != v[i+1].first)
            ans = min(ans,v[i].second+2);
    }

    if(ans == INT_MAX) ans = 0;
    cout << ans << endl;
}

int main()
{
    w(t)
}