#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void bruteforce()
{}

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    map<int,int> mp;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        mp[arr[i]]++;
    }
    
    int mex = 0;
    while(mp[mex] > 0) mex++;

    vector<int> v;
    for(int i = 0; i < n; i++)
    {
        if(!mex)
        {
            for(;i<n; i++) v.push_back(0);
            break;
        }

        map<int,int> nmp;
        while(s(nmp) != mex && i < n)
        {
            if(arr[i] < mex) nmp[arr[i]]++;
            mp[arr[i]]--;
            i++;
        }
        i--;
        v.push_back(mex);
        mex = 0;
        while(mp[mex] > 0) mex++;
    }
    cout << v.size() << endl;
    for(auto x : v) cout << x << " ";
    cout << endl;

}

int32_t main()
{
      //        Bismillah
    BOOST
    w(t)
    // solve();
    //bruteforce();
}