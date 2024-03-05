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

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}

int Case;

bool cmp(pair<int,int> a, pair<int,int> b)
{
    return a.second > b.second;
}

void solve()
{
    int n;
    cin >> n;

    vector<pair<int,int>> v;

    // arr[] = {{1,2},{3,4}};

    for(int i = 0; i < n; i++)
    {
        int group,solve;
        cin >> group >> solve;
        v.push_back({group,solve});
    }

    stable_sort(v.begin(),v.end(),cmp);

    for(auto x : v)
    {
        cout << x.first << " " << x.second << endl;
    }
    // sort(arr,arr+n,cmp);

}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}