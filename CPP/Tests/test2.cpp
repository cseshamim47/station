//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 40000
#define ll long long
ll cnt;

vector<int> primes;

void genPrime()
{
    bool isPrime[MAX];
    for(int i = 3; i < MAX; i+=2) isPrime[i] = true;

    for(int i = 3; i*i < MAX; i+=2)
    {
        if(isPrime[i])
            for(int j = i*i; j <= MAX; j+=i)
                isPrime[j] = false;
    }

    primes.push_back(2);
    for(int i = 3; i < 30; i+=2)
    {
        if(isPrime[i])
            primes.push_back(i);
    }
}

void segSieve(ll L, ll R)
{
    
}

int main()
{
      //        Bismillah
      genPrime();
    
}