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
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }

    for(int i = 0; i < n; i++)
    {
        for(int j =  0; j < n; j++)
        {
            for(int k = 0; k < n; k++)
            {
                if(i==j || j==k || i==k) continue;
                int sum = arr[i]-arr[j];
                if(sum % arr[k] != 0)
                {
                    cout << "no" << endl;
                    return;
                }
            }
        }
        cout << endl;
    }
    cout << "yes" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}