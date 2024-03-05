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

int f(int* arr)
{
    return (arr[2]-arr[0])+(arr[1]-arr[0])+(arr[2]-arr[1]);
}

int Case;
void solve()
{
    int arr[3];
    cin >> arr[0] >> arr[1] >> arr[2];

    sort(arr,arr+3);
    int ans = INT_MAX;
    
    if(arr[0] < arr[2]) arr[0]++,arr[2]--; 

    ans = min(ans,f(arr));
    if(ans < 0) ans = 0;
    cout << ans << endl;

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