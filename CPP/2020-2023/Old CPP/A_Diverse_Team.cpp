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
void solve()
{
    int n, k;
    cin >> n >> k;
    int arr[n];
    map<int,int> mp;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        // if(mp[arr[i]] == 0)
        mp[arr[i]] = i+1;
    }
    if(mp.size() < k) cout << "NO" << endl;
    else
    {
        cout << "YES" << endl;
        sort(arr,arr+n);
        
        for(auto x : mp)
        {
            if(k == 0) break;
            cout << x.second << " ";
            k--;
        }
        cout << endl;
    }


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