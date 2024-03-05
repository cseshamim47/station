#include <bits/stdc++.h>
using namespace std;

#define endl "\n"
#define fo(i,n) for(int i = 0; i < n; i++)
#define Fo(i,k,n) for(int i = k; i < n; i++)


void solve()
{
    int n, k;
    cin >> n >> k;
    int lb = k+1;
    int ub = (k*2)+1;

    cout << ceil(1.00*n/ub) << endl;
    if(n%ub == 0)
    {
        Fo(_,lb,n+1)
        {
            cout << _ << " ";
            _+=(ub-1);

        }
    }else
    {
        int handle = n%ub;
        if(handle < lb) handle = lb;
        int i = 1;
        int ans = 0;
        Fo(i,1,handle+1)
        {
            if((i-k)<= 1 && (i+k)==handle)
            {
                ans = i;
                break;
            }
        }

        Fo(_,ans,n+1)
        {
            cout << _ << " ";
            _+=(ub-1);
        }


    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;

}
