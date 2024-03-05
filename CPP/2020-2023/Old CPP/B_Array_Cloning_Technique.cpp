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
    int n;
    cin >> n;
    int arr[n];
    map<int,int> mp;
    int mx = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        mp[arr[i]]++;
        mx = max(mp[arr[i]],mx);
    }

    
    int copy = 0;
    int operation = 0;
    int cnt = mx;
    while(true)
    {
        // cout << operation << endl;
        // getchar();
        if(cnt == n) break;
        copy++; // 2
        operation++; // 1+1+1
        operation += min(mx,n-cnt); 
        cnt+=min(mx,n-cnt);
        mx *= 2;
    }
    cout << operation << endl;


}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}