#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    vector<int> v(n,0);
    string str;
    for(int i = 0; i < n; i++) cin >> v[i];
    vector<int> cv(v);
    cin >> str;
    vector<int> zero;
    vector<int> one;
    for(int i = 0; i < n; i++)
    {
        if(str[i]=='0') zero.push_back(v[i]);
        else one.push_back(v[i]);  
    }
   
    sort(v.begin(),v.end());
    sort(zero.rbegin(),zero.rend());
    sort(one.rbegin(),one.rend());
    map<int,int> mp;
    int last = v.size()-1;
    for(int i = 0; i < one.size(); i++)
    {
        mp[one[i]] = v[last--];
    }
    for(int i = 0; i < zero.size(); i++)
    {
        mp[zero[i]] = v[last--];
    }
    for(int i = 0; i < n; i++)
    {
        cout << mp[cv[i]] << " ";
    }
    cout << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}