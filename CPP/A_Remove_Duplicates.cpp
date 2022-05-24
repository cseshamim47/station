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

void f()
{}

int Case;
void solve()
{
    int n;
    cin >> n;
    map<int,int> mp;
    vector<int> v;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        mp[arr[i]] = i;
    }
    for(auto x : mp) v.push_back(x.second);
    sort(all(v));
    cout << v.size() << endl;
    for(int x : v) cout << arr[x] << " ";
    printf("\n");
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //f();
}