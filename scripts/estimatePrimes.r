primes = 200000;
#R = (1/log(primes)) + ((1/pi)*atan(pi/log(primes)))
R = primes / (log(primes) - 1)
cat(R, "\n\r")