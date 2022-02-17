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
    int arr[n+1];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    int l = -10;
    int r = -10;
    for(int i = 0; i < n; i++)
    {
        if(arr[i] == i+1) continue;
        else
        {
            for(int j = i+1; j<n; j++)
            {
                if(arr[j] == i+1)
                {
                    r = j;
                    l = i;
                }
                if(l!=-10 && r!=-10) break;
            }
        }
        if(l!=-10 && r!=-10) break;
    }
    for(int i = 0; i < n; i++) 
    {
        if(l == i)
        {
            for(int j = r; j >= l; j--)
            {
                cout << arr[j] << " ";
            }
            i = r;
            continue;
        }
        cout << arr[i] << " ";
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