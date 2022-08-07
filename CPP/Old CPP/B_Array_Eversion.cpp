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
    int mx = 0;
    int mn = 0;
    for(int i = 0; i < n; i++) 
    {
        cin >> arr[i];
        mx = max(arr[i],mx);
        if(arr[i] < mx)
        {
            mn = max(arr[i],mn);
        }
    }

    if(n == 1)
    {
        cout << 0 << endl;
        return;
    }

    int cnt = 0;
    int curr = -1;
    for(int i = n-1; i >= 0; i--)
    {
        if(curr >= arr[i]) continue;
        if(arr[i] < mn)
        {
            cnt++;
            curr = arr[i];
        }
        else if(arr[i] == mn)
        {
            cnt++;
            curr = arr[i];
            break;
        }
        else break;   
    }
    cout << cnt << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //bruteforce();
}