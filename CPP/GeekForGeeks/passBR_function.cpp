#include <iostream>
#include <vector>
using namespace std;

void printAlphabets(vector<char> &x){
    for(auto y : x) 
        cout << y << " ";
}

int main()
{
    vector<char> ch;

    for(int i = 97; i<97+26; i++){
        ch.push_back(i);
    }
    printAlphabets(ch);
    
}