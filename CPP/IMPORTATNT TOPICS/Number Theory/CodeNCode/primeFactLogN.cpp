#include <bits/stdc++.h>
using namespace std;


const int N = 1e5+10;
vector<int> sf(N,-1); // sf = smallestFactor

void init()
{
    sf[1] = 1;
    for(int i = 2; i <= N; i++){

        if(sf[i] == -1)
        {
            sf[i] = i;
            for(int j = i+i; j <= N; j+=i)
            {
                if(sf[j] == -1)
                sf[j] = i;
            }
        }
    }
}


void primeFactorization(int n)
{
    if(n == 1) cout << 1 << endl;
    
    while(sf[n] != 1)
    {
        cout << sf[n] << " ";
        n = n/sf[n];
    }
}


int main()
{
    //    Bismillah
    init();
    int n;
    cin >> n;
    
    primeFactorization(n);
    

    
}