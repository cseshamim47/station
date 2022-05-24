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
    int n,k;
    cin >> n >> k;
    int arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];
    int l = 0, r = n-1;
    int cnt = 0;
    while(l<=r)
    {
        if(l == r && arr[l] <= k)
        {
             cnt++;
             l++;
             r--;
        }else if(arr[l] <= k && arr[r] <= k) 
        {
            cnt+=2;
            l++;
            r--;
        }else if(arr[l] <= k)
        {
            cnt++;
            l++;
        }else if(arr[r] <= k)
        {
            cnt++;
            r--;
        }else
        {
            break;
        }
    }
    // for(int i = 0; i < n; i++)
    // {
    //     if(arr[i] <= k) cnt++;
    //     else break;
    // }
    // int cnt1 = 0;
    // for(int i = n-1; i >= 0; i--)
    // {
    //     if(arr[i] <= k) cnt1++;
    //     else break;
    // }
    // cout << max(cnt,cnt1) << endl;
    cout << cnt << endl;
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