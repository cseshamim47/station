#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

unordered_map<char,int> um;
bool cmp(string s1, string s2)
{
    int len = (int)min(s1.length(),s2.length());
    for(int i = 0; i < len; i++)
    {
        if(um[s1[i]] < um[s2[i]]) return true;
        else if(um[s1[i]] > um[s2[i]]) return false;
    }

    if(s1.size() < s2.size()) return true;
    else return false;
}

void solve()
{
    string str;
    cin >> str;
    for(int i = 0; i < 26; i++)
    {   
        um[str[i]] = i;
    }

    int t,x;
    cin >> x;
    t = x;
    vector<string> v;
    while(t--)
    {
        string s;
        cin >> s;
        v.push_back(s);
    }

    sort(v.begin(),v.end(),cmp);

    for(int i = 0; i < x; i++)
    {
        cout << v[i] << endl;
    }
}
int32_t main()
{
      //        Bismillah
    // w(t)
    solve();
    
}