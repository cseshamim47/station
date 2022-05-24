#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int f(int* arr, int n, int ltr)
{
    int container = 1; 
    int cur = 0;
    for(int i = 0; i < n; i++)
    {
        if(cur+arr[i] <= ltr)
        {
            cur+=arr[i];
        }
        else if(arr[i] > ltr) return INT_MAX;
        else
        {
            cur = arr[i];
            container++;
        }
    }
    return container;
}

int Case;
void solve()
{
    int b,c;
    cin >> b >> c;
    int arr[b];
    int mx = 0;
    for(int i = 0; i < b; i++)
    {
        cin >> arr[i];
        mx = max(arr[i],mx);
    }

    int l = 1;
    int h = 1e9;

    while(l < h)
    {
        int mid = (l+h)/2;
        // cout << l << " " << mid << " " << h  << " : " << f(arr,b,mid) << endl;
        if(f(arr,b,mid) <= c)
        {
            h = mid;
        }else
        {
            l = mid+1;
        }
    }

    printf("Case %d: ", ++Case);
    cout << h << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}