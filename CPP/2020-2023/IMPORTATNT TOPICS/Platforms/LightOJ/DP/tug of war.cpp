#include <bits/stdc++.h>
using namespace std;

// bool f(int pos, int taken, int sum)
// {
//     if(pos == n)
//     {
//         if(taken == 0)
//         {
//             return (sum == 0);
//         }
//         return false;
//     }


//     bool take = false;
//     if(taken >= 1 && sum >= v[pos])
//     {
//         take = f(pos+1,taken-1,sum-v[pos]);
//     }
//     bool nottake = f(pos+1,taken,sum);

//     return (take|nottake);
// }


int total = 0;
int n;

bool dp[3][51][50001];


int kase;

void solve()
{
    cin >> n;
    total = 0;
    vector<int> v(n);
    for(int i = 0; i < n; i++)
    {
        cin >> v[i];
        total += v[i];
    }

    sort(v.begin(),v.end(),greater<int>());

    vector<int> pref(n+1,0);

    int k = 0;
    for(int i = 0; i < n; i++)
    {
        k += v[i];
        pref[i] = k;
    }


    int x=0,y=0;

    for(int pos = 0; pos < 2; pos++)
    {
        for(int taken = 0; taken <= (n+1)/2; taken++)
        {
            for(int sum = 0; sum <= (total+1)/2; sum++)
            {
                dp[pos][taken][sum] = false;
            }
        }
    }

    dp[0][0][0] = true;
    dp[1][0][0] = true;

    
    for(int pos = n-1; pos >= 0; pos--) // 0 depend kortese 1 er upor tai 1 calculate hoye ashte hobe
    {
        int iCanTake = min(n-pos,(n+1)/2);
        for(int taken = 1; taken <= iCanTake; taken++) // taken depend kortese taken-1 er upor 
        {
            int mxSum = pref[pos+taken-1];
            if(pos >= 1) mxSum -= pref[pos-1]; 

            for(int sum = 0; sum <= mxSum; sum++) // sum depend kore sum-v[pos] er upor 
            {
                bool take = false;
                if(taken >= 1 && sum >= v[pos])
                {
                    take = dp[(pos+1)%2][taken-1][sum-v[pos]];
                }
                
                bool nottake = dp[(pos+1)%2][taken][sum];

                dp[pos%2][taken][sum] =  (take | nottake);
            }
        }
    }

    for(int sum = (total+1)/2; sum >= 0; sum--)
    {
        if(dp[0][(n+1)/2][sum])
        {
            x = sum;
            y = total - sum;
            break;
        }
    }

    if(x > y) swap(x,y);
    cout << "Case " << ++kase << ": ";
    cout << x << " " << y << endl;

}

int32_t main()
{
    //    Bismillah
    int n;
    cin >> n;
    while(n--)
    {
        solve();
    }
}